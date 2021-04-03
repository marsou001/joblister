<?php 
    class Job{
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        #Get All Jobs
        public function getAllJobs() {
            $this->db->query("SELECT jobs.*, categories.name AS cname
                            FROM jobs
                            INNER JOIN categories
                            ON jobs.category_id = categories.id
                            ORDER BY post_date DESC");
            $result = $this->db->resultSet();
            return $result;
        }        

        #Get All Categories
        public function getAllCategories() {
            $this->db->query("SELECT * FROM categories");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getByCategory($category) {
            $this->db->query("SELECT jobs.*, categories.name AS cname
                            FROM jobs
                            INNER JOIN categories
                            ON jobs.category_id = categories.id
                            WHERE jobs.category_id = $category
                            ORDER BY post_date DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getCategory($category_id) {
            $this->db->query("SELECT name FROM categories WHERE id = :category_id");            
            $this->db->bind(":category_id", $category_id);
            $row = $this->db->single();            
            return $row;
        }

        public function getJob($id) {
            $this->db->query("SELECT * FROM jobs WHERE id = :id");            
            $this->db->bind(":id", $id);
            $row = $this->db->single();            
            return $row;
        }

        public function create($data) {
            $this->db->query("INSERT INTO jobs (category_id, job_title,
            company, description, location, salary, contact_user,
            contact_email)
            VALUES (:category_id, :job_title, :company, :description, :location, :salary,
            :contact_user, :contact_email)");
            
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);            
            
            return $this->db->execute();        
        }

        public function delete($id) {
            $this->db->query("DELETE FROM jobs WHERE id = $id");
            return $this->db->execute();
        }

        public function update($id, $data) {
            $this->db->query("UPDATE jobs SET category_id = :category_id,
                                              job_title = :job_title,
                                              company = :company,
                                              description = :description,
                                              location = :location,
                                              salary = :salary,
                                              contact_user = :contact_user,
                                              contact_email = :contact_email
            WHERE id = $id");
            
            $this->db->bind(':category_id', $data['category_id']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);            
            
            return $this->db->execute();        
        }
    }
?>