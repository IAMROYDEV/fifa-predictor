<?php

use Illuminate\Database\Seeder;

class add_code_col_to_teams extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
        "Uruguay" => "uy",
        "Tunisia" => "tn",
        "Switzerland" => "ch",
        "Sweden" => "se",
        "Spain" => "es",
        "South_Korea" => "kr",
        "Serbia" => "rs",
        "Senegal" => "sn",
        "Saudi_Arabia" => "sa",
        "Russia" => "ru",
        "Portugal" => "pt",
        "Poland" => "pl",
        "Peru" => "pe",
        "Panama" => "pa",
        "Nigeria" => "ng",
        "Morocco" => "ma",
        "Mexico" => "mx",
        "Japan" => "jp",
        "Iran" => "ir",
        "Iceland" => "is",
        "Germany" => "de",
        "France" => "fr",
        "England" => "gb",
        "Egypt" => "eg",
        "Denmark" => "dk",
        "Croatia" => "hr",
        "Costa_Rica" => "cr",
        "Colombia" => "co",
        "Brazil" => "br",
        "Belgium" => "be",
        "Australia" => "au",
        "Argentina" => "ar"];
    foreach ($countries as $country=>$code) {
        \App\Team::whereName($country)->update([
            'code' => $code
        ]);
    }
    }
}
