<?php require(__DIR__ . '/../../partials/head.php') ?>    
<?php require(__DIR__ . '/../../partials/nav.php') ?>
<?php require(__DIR__ . '/../../partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes" class="text-blue-500 hover:underline">Go Back...</a>
        </p>
        <p>
            <?= htmlspecialchars($note["body"]) ?>
        </p>
        <form class="mt-6" method="POST">
            <input type="hidden" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>
<?php require(__DIR__ . '/../../partials/footer.php') ?>