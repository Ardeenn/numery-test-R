<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generator_model extends CI_Model
{

    public function Numery($nazwa_panstwa, $kierunkowy, $ilosc)
    {
        $data['Operatorzy'] = array(
            'Austria' => array(
                '660' => 'Hutchison 3G Austria GmbH',
                '664' => 'A1 Telekom Austria Aktiengesellschaft',
                '676' => 'T-Mobile Austria GmbH',
            ),
            'Egipt' => array(
                '11' => 'Etisalat Egypt',
                '12' => 'Mobinil',
                '10' => 'Vodafone Egypt',
            ),
            'Brazylia' => array(
                '21' => 'TNL PCS S.A.',
                '31' => 'TNL PCS S.A.',
                '41' => 'TIM Celular S.A.',
                '15' => 'Telefónica',
            )
        );
        $Wyniki = array();
        for ($i = 0; $i < $ilosc; $i++) {
            $prefiks_operatora = array_rand($data['Operatorzy'][$nazwa_panstwa]);
            $nazwa_operatora = $data['Operatorzy'][$nazwa_panstwa][$prefiks_operatora];
            $dlugosc = 9 - strlen($prefiks_operatora);
            powtorka:
            $random = random_string('numeric', $dlugosc);
            $numer_plus_operator = $kierunkowy . $prefiks_operatora . $random . " => " . $nazwa_operatora;
            $numer = $prefiks_operatora . $random;
            $plik = fopen('application/data/' . $nazwa_panstwa . ".txt", "r");
            while (!feof($plik)) {
                $linia = fgets($plik);
                if ($numer == $linia) {
                    fclose($plik);
                    goto powtorka;
                }
            }
            fclose($plik);
            write_file('application/data/' . $nazwa_panstwa . ".txt", $numer . "\r\n", 'a+');
            array_push($Wyniki, $numer_plus_operator);
        }
        return $Wyniki;
    }
}
