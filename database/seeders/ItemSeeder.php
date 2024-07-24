<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */

    protected function separateWeight($string){

        // tramite str_replace rimuovo spazi e lb dalle stringhe del peso
        $itemWeight = str_replace(' lb.','', $string);

        // se il peso contiene un '/'
        if(str_contains($itemWeight, '/')){

            // tranmite explode trasformo la stringa in un array contente i numeri che la compongono (1/4 => [1, 4])
            $explodedWeight = explode('/', $itemWeight);

            // eseguo una divisione tra il primo numero nell'array ed il secondo numero dell'array (1 / 4 = 0.25)
            $itemWeight = floatval($explodedWeight[0] / $explodedWeight[1]);

        }else{
            // se il peso non contiene '\' rendo la stringa un intero
            $itemWeight = intval($itemWeight);
        }     

        // tramite espressioni regolari e str_replace, rimuovo numeri e punteggiatura dalla stringa.
        $itemUnit = str_replace(['.', '/' ,' '], '', preg_replace('/[0-9]+/', '', $string));


        // ritorno i due valori sotto forma di array
        return [$itemWeight, $itemUnit];

    }



    protected function separateCost($string){
        
        // tramite espressioni regolari, rimuovo ogni valore che non sia un numero dalla stringa, quindi tramite intval() trasformo il risultato in un intero
        $itemCost =  intval(str_replace(['/[^0-9]/'], '', $string));    


        // // tramite espressioni regolari e str_replace, rimuovo numeri e punteggiatura dalla stringa. 
        $itemCoin = str_replace(['.', '/' ,' '], '', preg_replace('/[0-9]+/', '', $string));


        // ritorno i due valori sotto forma di array
        return [$itemCost, $itemCoin];

    }

    
    public function run(): void
    {
        $data = $this->getCSVData(__DIR__ . '/items.csv');

        
        //
        foreach ($data as $index => $row) {

            // tramite list eseguo una "destrutturazione" dell'array ritornato dalla funzione separateWeight(), passando come parametro la riga del file CSV
            list($itemWeight, $itemUnit) = $this->separateWeight($row[4]);

            // tramite list eseguo una "destrutturazione" dell'array ritornato dalla funzione separateCost(), passando come parametro la riga del file CSV
            list($itemCost, $itemCoin) = $this->separateCost($row[5]);


            if($index !== 0){
                $item = new Item;

                $item->name = $row[0];
                $item->slug = $row[1];
                $item->type = $row[2];
                $item->category = $row[3];
                $item->weight = $itemWeight;
                $item->unit = $itemUnit;
                $item->cost = $itemCost;
                $item->coin = $itemCoin;
                $item->damage_dice = $row[6];
                $item->image = strtolower(str_replace(' ', '-', $item->category));
                $item->description = null;
                $item->save();
                //dump($item);
            }
        }
    }


    public function getCSVData(string $path) {		
									
        $data = [];							
    									
        $file_stream = fopen($path, 'r');			
     									
        if($file_stream === false){				
            exit('Cannot open the file'. $path);		
        }								
                                        
        while(($row = fgetcsv($file_stream)) !== false){	

    	    //var_dump($row);					
            $data[] = $row;					
        }								
    								
        fclose($file_stream);					
                                        
        return $data;						
     }
}
