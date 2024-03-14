<?php
        class DecentralizationRepository extends DB{
            public function createDecentralization($decentralization){
                $this->create("decentralizations", $decentralization);
            }

            public function updateDecentralization($decentralization, $id){// by id
                $this->update("decentralizations", $decentralization, "decentralization_id = ".$id);
            }

            public function deleteDecentralization($id){// by id
                $this->delete("decentralizations", "decentralization_id = ".$id);
            }

            public function getAllDecentralization(){
                return $this->read("decentralizations");
            }
            
            public function getDecentralizationById($id){
                return $this->getAllByWhere("decentralizations", "decentralization_id = ".$id);
            }
        }
    ?>