<?php require_once APPROOT . '/views/inc/header.php';  ?>
<div class="row mb-4">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>Add Post
        </a>
    </div>
</div>

<?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h3 class="card-title">
            <?php echo $post->title ?>
        </h3>
        <div class="bg-light p-2 mb-3">
            Created by: <?php echo $post->name ?> on: <?php echo $post->postCreate_at ?>
        </div>
        <p><?php echo $post->body ?></p>
        <p><a href=""><?php echo $post->tags ?></a></p>
        <a href="<?php echo URLROOT; ?>posts/show/<?php $post->postId; ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach; ?>

<?php require_once APPROOT . '/views/inc/footer.php';  ?>