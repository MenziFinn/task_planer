<?php namespace App\Libraries;

class GetStatistics {

    public function getWealth($user_id) {
        $deposits_model = new \App\Models\Deposits();
        $payout_model = new \App\Models\Payout();

        $payout_array = $payout_model->getPayoutByUserId($user_id);
        $deposits_array = $deposits_model->getDepositsByUserId($user_id);

        $payout_all = 0;
        foreach ($payout_array as $payout):
            $payout_all = $payout->amount + $payout_all;
        endforeach;

        $deposits_all = 0;
        foreach ($deposits_array as $deposits):
            $deposits_all = $deposits->amount + $deposits_all;
        endforeach;

        $array_wealth = [
            'payout_all' => $payout_all,
            'deposits_all' => $deposits_all
        ];

        return $array_wealth;
    }

    public function getBettings($user_id) {
        $betting_model = new \App\Models\Betting();

        $array_bettings = $betting_model->getBettingsWhereFinish($user_id);
        $betting_won = $betting_lost = $wins = $lost = $stake = $betting_won_without_stake = 0;
        $sports = array();

        foreach ($array_bettings as $betting):
            $sports[] = $betting->sport;
            $stake = $stake + $betting->stake;

            if ($betting->receive <= 0):
                $betting_lost = $betting_lost + $betting->receive;
            else:
                $betting_won = $betting_won + $betting->receive;
                $betting_won_without_stake = $betting_won_without_stake + ($betting->receive - $betting->stake);
            endif;

            if ($betting->status == 1):
                $wins++;
            elseif ($betting->status == 2):
                $lost++;
            endif;
        endforeach;

        $array_bettings = [
            'betting_won' => $betting_won,
            'betting_won_without_stake' => $betting_won_without_stake,
            'betting_lost' => abs($betting_lost),
            'wins' => $wins,
            'lost' => $lost,
            'stake' => $stake,
            'sports' => $this->validateSport($sports)
        ];

        return $array_bettings;
    }

    public function validateSport($sports) {
        $sports_unique = array_reverse(array_slice(array_count_values($sports), 0, 3));
        asort($sports_unique);

        $sport_count_all_values = 0;
        foreach ($sports_unique as $sport):
            $sport_count_all_values = $sport_count_all_values + $sport;
        endforeach;

        if (!empty(array_values($sports_unique)[0])):
            $sport_one_value = array_values($sports_unique)[0];
            $sport_one_name = array_keys($sports_unique)[0];
        else:
            $sport_one_value = 0;
            $sport_one_name = "";
        endif;

        if (!empty(array_values($sports_unique)[1])):
            $sport_two_value = array_values($sports_unique)[1];
            $sport_two_name = array_keys($sports_unique)[1];
        else:
            $sport_two_value = 0;
            $sport_two_name = "";
        endif;

        if (!empty(array_values($sports_unique)[2])):
            $sport_three_value = array_values($sports_unique)[2];
            $sport_three_name = array_keys($sports_unique)[2];
        else:
            $sport_three_value = 0;
            $sport_three_name = "";
        endif;

        $sport_array = [
            'sport_count_all_values' => $sport_count_all_values,
            'sport_one_value' => $sport_one_value,
            'sport_one_name' => $sport_one_name,
            'sport_two_value' => $sport_two_value,
            'sport_two_name' => $sport_two_name,
            'sport_three_value' => $sport_three_value,
            'sport_three_name' => $sport_three_name,
        ];

        return $sport_array;
    }

}