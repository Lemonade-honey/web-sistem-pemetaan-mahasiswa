<?php

namespace App\Services\Interfaces;

interface ScoreService
{
    /**
     * scores label user
     * 
     * memberikan score pada data label yang ada pada database, sesuai dengan user auth
     */
    public function scoresLabelsUser(): array;

    /**
     * syncorice data score
     * 
     * untuk mensyncronice semua score dan menyimpannya
     */
    public function syncroniceScoreUser(): void;
}