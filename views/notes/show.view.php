<?php require(__DIR__ . '/../../partials/head.php') ?>    
<?php require(__DIR__ . '/../../partials/nav.php') ?>
<?php require(__DIR__ . '/../../partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
            <a href="/notes" class="text-blue-500 hover:underline">Go Back...</a>
        </p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <footer class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500">Edit</a>
        </footer>
        <form class="mt-6" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500">Delete</button>
        </form>
    </div>
</main>
<?php require(__DIR__ . '/../../partials/footer.php') ?>