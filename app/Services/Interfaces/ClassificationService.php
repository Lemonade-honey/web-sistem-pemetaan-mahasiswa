<?php

namespace App\Services\Interfaces;
interface ClassificationService{

    /**
     * GET Connection
     * 
     * mengecek koneksi terhadap endpoint
     */
    public function connectionGateaway();

    /**
     * Classificasi dokumen
     * 
     * mengklasifikasi dokumen yang diberikan
     */
    public function classificationDokumen(string $file_path);

    /**
     * Label Logic
     * 
     * menghitung hasil dari prediksi classificasi yang telah dilakukan
     */
    public function labelCalculate(array $probabilitas, int $min = 50): ?array;

    /**
     * TRANSKIP NILAI LOGIC SCORES
     */
    public function transkipNilaiScore(string $file_path);
}