<?php
namespace app\components;

use Yii;
use yii\base\Component;

/**
 * Class Terbilang
 *
 * @package app\components
 */
class Terbilang extends Component
{

    /**
     * @param $angka
     *
     * @return string
     */
    public function rupiah($angka)
    {
        $bilangan = [
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas'
        ];
        if ($angka < 12) {
            $result = $bilangan[$angka];
        } else if ($angka < 20) {
            $result = $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            $result = trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) {
            $result = sprintf('Seratus %s', $this->rupiah($angka - 100));
        } else if ($angka < 1000) {
            $hasil_bagi = (int)($angka / 100);
            $hasil_mod = $angka % 100;
            $result = trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], $this->rupiah($hasil_mod)));
        } else if ($angka < 2000) {
            $result = trim(sprintf('Seribu %s', $this->rupiah($angka - 1000)));
        } else if ($angka < 1000000) {
            $hasil_bagi = (int)($angka / 1000);
            $hasil_mod = $angka % 1000;
            $result = sprintf('%s Ribu %s', $this->rupiah($hasil_bagi), $this->rupiah($hasil_mod));
        } else if ($angka < 1000000000) {
            $hasil_bagi = (int)($angka / 1000000);
            $hasil_mod = $angka % 1000000;
            $result = trim(sprintf('%s Juta %s', $this->rupiah($hasil_bagi), $this->rupiah($hasil_mod)));
        } else if ($angka < 1000000000000) {
            $hasil_bagi = (int)($angka / 1000000000);
            $hasil_mod = fmod($angka, 1000000000);
            $result = trim(sprintf('%s Milyar %s', $this->rupiah($hasil_bagi), $this->rupiah($hasil_mod)));
        } else if ($angka < 1000000000000000) {
            $hasil_bagi = $angka / 1000000000000;
            $hasil_mod = fmod($angka, 1000000000000);
            $result = trim(sprintf('%s Triliun %s', $this->rupiah($hasil_bagi), $this->rupiah($hasil_mod)));
        } else {
            $result = 'Data Salah';
        }
        return $result;
    }
}