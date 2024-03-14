<?php
    class ImportRepository extends DB{
        public function createImport($import){
            $this->create("imports", $import);
        }

        public function updateImport($import, $id){// by id
            $this->update("imports", $import, "import_id = ".$id);
        }

        public function deleteImport($id){// by id
            $this->delete("imports", "import_id = ".$id);
        }

        public function getAllImport(){
            return $this->read("imports");
        }
        
        public function getImportById($id){
            return $this->getAllByWhere("imports", "import_id = ".$id);
        }
    }
?>