

<?php $__env->startSection('title', 'Create Movie Review'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto">
    <h1 class="text-4xl font-bold text-gray-100 mb-6 text-center">Add Movie Review</h1>
    
    <form method="POST" action="<?php echo e(route('movies.store')); ?>" class="bg-[#181818] text-white rounded-lg shadow-lg p-6 border border-gray-700">
        <?php echo csrf_field(); ?>
        
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Movie Title *</label>
            <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required
                class="w-full px-4 py-2 bg-[#222] border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-600 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-400 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-2">Star Rating *</label>
            <div class="flex gap-2">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="<?php echo e($i); ?>" <?php echo e(old('rating') == $i ? 'checked' : ''); ?> 
                            class="hidden peer" required>
                        <span class="text-4xl text-gray-600 peer-checked:text-yellow-400 hover:text-yellow-300 transition">★</span>
                    </label>
                <?php endfor; ?>
            </div>
            <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-400 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="mb-4">
            <label for="review" class="block text-sm font-medium text-gray-300 mb-2">Review *</label>
            <textarea name="review" id="review" rows="6" required
                class="w-full px-4 py-2 bg-[#222] border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-600 <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('review')); ?></textarea>
            <p class="text-sm text-gray-400 mt-1">Character count: <span id="charCount">0</span></p>
            <?php $__errorArgs = ['review'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-400 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="mb-4">
            <label for="poster_url" class="block text-sm font-medium text-gray-300 mb-2">Poster URL (Optional)</label>
            <input type="url" name="poster_url" id="poster_url" value="<?php echo e(old('poster_url')); ?>"
                placeholder="https://example.com/poster.jpg"
                class="w-full px-4 py-2 bg-[#222] border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-600 <?php $__errorArgs = ['poster_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <div id="posterPreviewContainer" class="mt-4 hidden">
                <p class="text-gray-400 text-sm mb-2">Preview:</p>
                <img id="posterPreview" src="" alt="Poster Preview" class="w-full h-80 object-cover rounded-lg shadow-lg border border-gray-700">
            </div>
            <?php $__errorArgs = ['poster_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-400 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="mb-4">
            <label for="genre" class="block text-sm font-medium text-gray-300 mb-2">Genre (Optional)</label>
            <select name="genre" id="genre" class="w-full px-4 py-2 bg-[#222] border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-600">
                <option value="">Select Genre</option>
                <option value="Action" <?php echo e(old('genre') == 'Action' ? 'selected' : ''); ?>>Action</option>
                <option value="Comedy" <?php echo e(old('genre') == 'Comedy' ? 'selected' : ''); ?>>Comedy</option>
                <option value="Drama" <?php echo e(old('genre') == 'Drama' ? 'selected' : ''); ?>>Drama</option>
                <option value="Horror" <?php echo e(old('genre') == 'Horror' ? 'selected' : ''); ?>>Horror</option>
                <option value="Romance" <?php echo e(old('genre') == 'Romance' ? 'selected' : ''); ?>>Romance</option>
                <option value="Sci-Fi" <?php echo e(old('genre') == 'Sci-Fi' ? 'selected' : ''); ?>>Sci-Fi</option>
                <option value="Thriller" <?php echo e(old('genre') == 'Thriller' ? 'selected' : ''); ?>>Thriller</option>
                <option value="Animation" <?php echo e(old('genre') == 'Animation' ? 'selected' : ''); ?>>Animation</option>
            </select>
        </div>
        
        
        <div class="mb-6">
            <label for="release_year" class="block text-sm font-medium text-gray-300 mb-2">Release Year (Optional)</label>
            <input type="number" name="release_year" id="release_year" value="<?php echo e(old('release_year')); ?>"
                min="1900" max="<?php echo e(date('Y') + 5); ?>"
                class="w-full px-4 py-2 bg-[#222] border border-gray-600 rounded-lg focus:ring-2 focus:ring-red-600 <?php $__errorArgs = ['release_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['release_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-red-400 text-sm mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        
        
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition">
                Add Movie Review
            </button>
            <a href="<?php echo e(route('movies.index')); ?>" class="flex-1 bg-gray-600 text-center text-white px-6 py-3 rounded-lg hover:bg-gray-500 transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // 🧮 Character Counter
    const reviewTextarea = document.getElementById('review');
    const charCount = document.getElementById('charCount');
    reviewTextarea.addEventListener('input', () => {
        charCount.textContent = reviewTextarea.value.length;
    });
    charCount.textContent = reviewTextarea.value.length;

    // 🖼 Live Poster Preview
    const posterInput = document.getElementById('poster_url');
    const posterPreview = document.getElementById('posterPreview');
    const previewContainer = document.getElementById('posterPreviewContainer');

    posterInput.addEventListener('input', () => {
        const url = posterInput.value.trim();
        if (url.match(/^https?:\/\/.+\.(jpg|jpeg|png|gif|webp)$/i)) {
            posterPreview.src = url;
            previewContainer.classList.remove('hidden');
        } else {
            previewContainer.classList.add('hidden');
            posterPreview.src = '';
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\Tacus_Quiz1\resources\views/movies/create.blade.php ENDPATH**/ ?>