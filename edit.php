<?php include_once 'config/init.php'; ?>

<?php 
    $job = new Job;    

    $id = isset($_GET['id']) ? $_GET['id'] : NULL;

    if (isset($_POST['submit'])) { 
        $data = array();

        $data['job_title'] = $_POST['job_title'];
        $data['category_id'] = $_POST['category_id'];
        $data['company'] = $_POST['company'];        
        $data['description'] = $_POST['description'];
        $data['location'] = $_POST['location'];
        $data['salary'] = $_POST['salary'];
        $data['contact_user'] = $_POST['contact_user'];
        $data['contact_email'] = $_POST['contact_email'];
        
        if ($job->update($id, $data)) {            
            redirect('index.php', 'Your job has been updated', 'success');
        } else {            
            redirect('index.php', 'Something went wrong', 'error');
        }
    }

    $template = new Template('templates/edit-job.php'); 
    
    $template->job = $job->getJob($id);
    $template->categories = $job->getAllCategories();
    
    echo $template;
?>