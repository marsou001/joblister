<?php include_once 'config/init.php'; ?>

<?php 
    $job = new Job;

    if (isset($_POST['del_id'])) {
        $del_id = $_POST['del_id'];
        if ($job->delete($del_id)) {
            redirect('index.php', 'Job deleted', 'success');
        } else {
            redirect('index.php', 'Job not deleted', 'error');
        }
    }

    $template = new Template('templates/single-job.php'); 
    
    $id = isset($_GET["id"]) ? $_GET["id"] : NULL;        

    $template->job = $job->getJob($id);
    
    echo $template;
?>