<?php
        class ContractRepository extends DB{
            public function createContract($contract){
                $this->create("contracts", $contract);
            }

            public function updateContract($contract, $id){// by id
                $this->update("contracts", $contract, "contract_id = ".$id);
            }

            public function getAllContract(){
                return $this->readDontHaveIsActive("contracts");
            }
            
            public function getContractById($id){
                return $this->getAllDontHaveIsActive("contracts", "contract_id = ".$id);
            }
        }
    ?>