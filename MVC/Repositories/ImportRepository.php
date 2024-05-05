<?php
    class ImportRepository extends DB{
        public function createImport($import) {
            // Assuming your `create1` method inserts the record into the database and returns the auto-generated ID
            $import_ids = $this->create1("imports", $import, "import_id");
            
            // Extract the import_id from the array
            $import_id = $import_ids['import_id'];
        
            echo "import_id new created = $import_id";
            return $import_id;
        }

        public function updateImport($import, $id){// by id
            $this->update("imports", $import, "import_id = ".$id,"import_id");
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