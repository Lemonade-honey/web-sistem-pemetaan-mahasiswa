<?php

namespace App\Services;

use App\Services\Interfaces\ScoreService;

class ScoreServiceImpl implements ScoreService
{
    // urutan labels
    const LABEL_KEY_ORDERS = [
        'data sains',
        'progammer',
        'sistem cerdas',
        'ui/ux'
    ];


    public function scoresLabelsUser(): array
    {
        $userFile = \App\Models\UserFile::where('user_id', auth()->user()->id)
        ->where('labels', '!=', '[]')
        ->where('labels', '!=', null)
        ->get();

        $labels = $userFile->groupBy('labels')->map(function($label){
            return $label->count() * 10;
        });

        // fill label date yang tidak ada
        $labels = self::fillCollectionKey($labels, self::LABEL_KEY_ORDERS)->toArray();

        // sorting berdasarkan key
        ksort($labels);

        return array_values($labels);
    }

    public function scoresTranskipUser()
    {
        $userProfile = \App\Models\UserProfile::where('user_id', auth()->user()->id)->first();

        if($userProfile){
            $labels = collect($userProfile->transkip_scores);
            $labels = self::fillCollectionKey($labels, self::LABEL_KEY_ORDERS)->toArray();
            // sorting berdasarkan key
            ksort($labels);

            return array_values($labels);
        }

        // default data
        return [0, 0, 0, 0];
    }

    public function scoresUserProject()
    {
        $userProject = \App\Models\UserProject::where('user_id', auth()->user()->id)->first();

        if($userProject){
            $labels = collect($userProject->scores);
            $labels = self::fillCollectionKey($labels, self::LABEL_KEY_ORDERS)->toArray();
            // sorting berdasarkan key
            ksort($labels);

            return array_values($labels);
        }

        // default data
        return [0, 0, 0, 0];
    }

    public function syncroniceScoreUser(): void
    {
        $labelsScore = $this->scoresLabelsUser();
        $transkipScore = $this->scoresTranskipUser();
        $projectScore = $this->scoresUserProject();

        // Array hasil penjumlahan
        $result = [];

        // Menggabungkan kedua array
        foreach ($labelsScore as $key => $value) {
            if (isset($result[$key])) {
                $result[$key] += $value;
            } else {
                $result[$key] = $value;
            }
        }

        foreach ($transkipScore as $key => $value) {
            if (isset($result[$key])) {
                $result[$key] += $value;
            } else {
                $result[$key] = $value;
            }
        }

        foreach ($projectScore as $key => $value) {
            if (isset($result[$key])) {
                $result[$key] += $value;
            } else {
                $result[$key] = $value;
            }
        }

        // save data to db
        $userProfile = \App\Models\UserProfile::where('user_id', auth()->user()->id)->first();
        $userProfile->statistik_scores = $result;
        $userProfile->save();
    }

    /**
     * Mengisi collection key yang tidak ada, sesuai dengan `requiredLabels`
     */
    private static function fillCollectionKey(\Illuminate\Support\Collection $collection, array $requiredLabels): \Illuminate\Support\Collection
    {
        foreach($requiredLabels as $label)
        {
            if(!$collection->has($label))
            {
                $collection->put($label, 0);
            }
        }

        return $collection;
    }
}