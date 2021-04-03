<?php include 'inc/header.php'; ?> 
    <h2 class="page-header">Edit Job Listing</h2>
    <form method="POST" action="edit.php?id=<?php echo $job->id ?>">
        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" class="form-control" name="company" value="<?php echo $job->company; ?>" />
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" class="form-control" name="category_id">
                <option value="#">Choose a category</option>
                <?php foreach($categories as $category): ?>
                    <?php if ($job->category_id == $category->id): ?>
                        <option value="<?php echo $category->id ?>" selected><?php echo $category->name ?></option>
                    <?php else: ?>
                        <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="job_title">Job Title</label>
            <input type="text" id="job_title" class="form-control" name="job_title" value="<?php echo $job->job_title; ?>" />
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" id="description" class="form-control" name="description"><?php echo $job->description; ?></textarea>
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" id="salary" class="form-control" name="salary" value="<?php echo $job->salary; ?>" />
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" id="location" class="form-control" name="location" value="<?php echo $job->location; ?>" />
        </div>

        <div class="form-group">
            <label for="contact_user">Contact User</label>
            <input type="text" id="contact_user" class="form-control" name="contact_user" value="<?php echo $job->contact_user; ?>" />
        </div>

        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="text" id="contact_email" class="form-control" name="contact_email" value="<?php echo $job->contact_email; ?>" />
        </div>

        <input type="submit" class="btn btn-secondary" name="submit" value="submit" />
    </form>
<?php include 'inc/footer.php'; ?> 