<?php
    class ImportRepository extends DB{
        public function createImport($import){
            $this->create("imports", $import, "import_id");
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

        public function getQuantityImportByMonth($year){
            return $this->get("SELECT MONTH(i.`import_date`) AS `month`, SUM(s.`quantity`) AS `total_quantity`
                FROM `imports` i
                JOIN `shipments` s ON i.`import_id` = s.`import_id`
                WHERE YEAR(i.`import_date`) = $year
                GROUP BY MONTH(i.`import_date`);
            ");
        }

        public function getQuantityImportByQuarter($year){
            return $this->get("SELECT QUARTER(i.`import_date`) AS `quarter`, SUM(s.`quantity`) AS `total_quantity`
                FROM `imports` i
                JOIN `shipments` s ON i.`import_id` = s.`import_id`
                WHERE YEAR(i.`import_date`) = $year
                GROUP BY QUARTER(i.`import_date`);
            ");
        }

        public function getDistinctYear(){
            return $this->get("SELECT DISTINCT YEAR(`import_date`) AS `year`
                FROM `imports`
                ORDER BY `Year`;
            ");
        }
    }
?>