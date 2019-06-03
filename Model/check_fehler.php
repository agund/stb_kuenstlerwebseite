<?php
class check_fehler
{
    public $fehler_feld = '';
    public $is_valide= '';
    public $valide= '';
    public $save_feld= '';

    function prüfen($name_eingabe,$fehler_array)
    {        
        if(!empty($fehler_array))
        {
            if(!empty($fehler_array['fehler'][$name_eingabe]))
            {                            
                $this->fehler_feld = $fehler_array['fehler'][$name_eingabe];
                $this->is_valide = 'is-invalid';
                $this->valide = 'invalid';
                
            } elseif(!empty($fehler_array['save_eingabe'][$name_eingabe])) 
            {
                $this->save_feld = $fehler_array['save_eingabe'][$name_eingabe];
                $this->is_valide = 'is-valid';
                $this->valide = 'valid';
            }
        }
    }  
}
?>