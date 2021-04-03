<?php include_once 'config/init.php'; ?>

<?php 
    $job = new Job;

    $template = new Template('templates/frontpage.php'); 
    
    $category = isset($_GET["category"]) ? $_GET["category"] : NULL;

    if ($category) {
        $template->jobs = $job->getByCategory($category);    
        $template->category = $job->getCategory($category); 
        $template->title = 'Jobs in ' . $template->category->name;
    } else {
        $template->title = 'Latest jobs';
        $template->jobs = $job->getAllJobs();        
    }

    $template->categories = $job->getAllCategories();
    
    echo $template;
?>