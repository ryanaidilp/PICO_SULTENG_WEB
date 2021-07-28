<?php

namespace App\Observers;

use App\Models\ProvinceCase;
use App\Models\ProvinceTest;
use Illuminate\Support\Carbon;
use App\Models\ProvinceGenderCase;

class ProvinceCaseObserver
{

    /**
     * Handle the ProvinceCase "creating" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function creating(ProvinceCase $case)
    {
        $latest = ProvinceCase::where("province_id", $case->province_id)
            ->latest("day")->first();
        $case->cumulative_positive = $case->positive + $latest->cumulative_positive;
        $case->cumulative_deceased = $case->deceased + $latest->cumulative_deceased;
        $case->cumulative_recovered = $case->recovered + $latest->cumulative_recovered;
        $case->cumulative_person_under_observation = ($case->person_under_observation ?? 0) + ($latest->cumulative_person_under_observation ?? 0);
        $case->cumulative_person_under_supervision = ($case->person_under_supervision ?? 0) + ($latest->cumulative_person_under_supervision ?? 0);
        $case->cumulative_finished_person_under_observation = ($case->finished_person_under_observation ?? 0) + ($latest->cumulative_finished_person_under_observation ?? 0);
        $case->cumulative_finished_person_under_supervision = ($case->finished_person_under_supervision ?? 0) + ($latest->cumulative_finished_person_under_supervision ?? 0);
    }

    /**
     * Handle the ProvinceCase "created" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function created(ProvinceCase $case)
    {
        if ($case->province_id == 72) {
            $gender = ProvinceGenderCase::where("province_id", $case->province_id)
                ->latest("day")->first();
            $test_query = ProvinceTest::where("province_id", $case->province_id)->latest("day");
            $test_pcr = $test_query->where("test_type_id", ProvinceTest::PCR);
            $test_rdt = $test_query->where("test_type_id", ProvinceTest::RDT);

            $new_gender = $gender->replicate();
            $new_pcr = $test_pcr->first()->replicate();
            $new_rdt = $test_rdt->first()->replicate();

            $new_gender->day = $case->day;
            $new_pcr->day = $case->day;
            $new_rdt->day = $case->day;


            $new_gender->save();
            $new_pcr->save();
            $new_rdt->save();

            $positive_new =  formatCase($case->positive);
            $recovered_new =  formatCase($case->recovered);
            $deceased_new = formatCase($case->deceased);
            $under_treatment_new =  formatCase($case->under_treatment);

            $positive_cumulative = number_format($case->cumulative_positive, 0, ",", ".");
            $recovered_cumulative = number_format($case->cumulative_recovered, 0, ",", ".");
            $deceased_cumulative = number_format($case->cumulative_death, 0, ",", ".");;
            $under_treatment_cumulative = number_format($case->cumulative_under_treatment, 0, ",", ".");

            $now = Carbon::parse($case->date)->translatedFormat("l, d F Y");
            $header = "Update COVID-19 di Sulawesi Tengah.  $now!";
            $content = "Kasus COVID-19 di Sulawesi Tengah sampai $now :\n$positive_new Positif : $positive_cumulative Kasus\n$recovered_new Sembuh : $recovered_cumulative Kasus\n$deceased_new Meninggal : $deceased_cumulative Kasus\n$under_treatment_new Dirawat : $under_treatment_cumulative Kasus";

            sendNotification($content, $header);
        }
    }

    /**
     * Handle the ProvinceCase "updated" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function updated(ProvinceCase $case)
    {
        //
    }

    /**
     * Handle the ProvinceCase "deleted" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function deleted(ProvinceCase $case)
    {
        //
    }

    /**
     * Handle the ProvinceCase "restored" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function restored(ProvinceCase $case)
    {
        //
    }

    /**
     * Handle the ProvinceCase "force deleted" event.
     *
     * @param  \App\Models\ProvinceCase  $case
     * @return void
     */
    public function forceDeleted(ProvinceCase $case)
    {
        //
    }
}
