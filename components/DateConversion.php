<?php
namespace app\components;

use yii;
use yii\base\Component;

/**
 * Class DateConversion
 *
 * @package app\components
 */
class DateConversion extends Component
{

    /**
     * @param        $date
     * @param string $separator
     *
     * @return array
     */
    public function konversiInd($date, $separator = '-')
    {
        $result = ['tgl' => '', 'bln' => '', 'thn' => ''];
        $arrDate = explode($separator, $date);
        if (count($arrDate) > 2) {
            $result = [
                'tgl' => $arrDate[2],
                'bln' => $this->monthInd($arrDate[1]),
                'thn' => $arrDate[0]
            ];
        }
        return $result;
    }

    /**
     * @param $numberMonth
     *
     * @return string
     */
    protected function monthInd($numberMonth)
    {
        $monthResult = 'Januari';
        $arrMonth = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        if (array_key_exists($numberMonth, $arrMonth) === true) {
            $monthResult = $arrMonth[$numberMonth];
        }
        return $monthResult;
    }
}