<?php
    class ImportReturnRepository extends DB{
        public function createImportReturn($importReturn){
            $this->create("import_returns", $importReturn);
        }

        public function updateImportReturn($importReturn, $id){// by id
            $this->update("import_returns", $importReturn, "import_return_id = ".$id);
        }

        public function deleteImportReturn($id){// by id
            $this->delete("import_returns", "import_return_id = ".$id);
        }

        public function getAllImportReturn(){
            return $this->read("import_returns");
        }
        
        public function getImportReturnById($id){
            return $this->getAllDontHaveIsActive("import_returns", "import_return_id = ".$id);
        }
    }
?>