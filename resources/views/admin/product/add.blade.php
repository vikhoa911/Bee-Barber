@extends('admins.layouts.index')

@section('content')
<div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
    <div class="mb-6">
        <h2 class="text-title-md2 font-semibold text-gray-800 dark:text-white">
            Thêm Sản Phẩm Mới
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Thêm sản phẩm mới vào hệ thống quản lý
        </p>
    </div>

    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <!-- Form Section -->
        <div class="col-span-12 xl:col-span-8">
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                            Tên Sản Phẩm <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('name') border-red-500 @enderror"
                               placeholder="Nhập tên sản phẩm">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Product Description -->
                    <div>
                        <label for="description" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                            Mô Tả Sản Phẩm
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('description') border-red-500 @enderror"
                                  placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price and Category Row -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <!-- Price -->
                        <div>
                            <label for="price" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                                Giá <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price') }}"
                                       step="0.01"
                                       min="0"
                                       class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 pr-12 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('price') border-red-500 @enderror"
                                       placeholder="0.00">
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    VNĐ
                                </span>
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                                Danh Mục <span class="text-red-500">*</span>
                            </label>
                            <select id="category" 
                                    name="category_id"
                                    class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('category_id') border-red-500 @enderror">
                                <option value="">Chọn danh mục</option>
                                <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>Cắt Tóc</option>
                                <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>Gội Đầu</option>
                                <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>Massage</option>
                                <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>Chăm Sóc Da</option>
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Stock and Status Row -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <!-- Stock Quantity -->
                        <div>
                            <label for="stock" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                                Số Lượng Tồn Kho
                            </label>
                            <input type="number" 
                                   id="stock" 
                                   name="stock" 
                                   value="{{ old('stock', 0) }}"
                                   min="0"
                                   class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('stock') border-red-500 @enderror"
                                   placeholder="0">
                            @error('stock')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                                Trạng Thái
                            </label>
                            <select id="status" 
                                    name="status"
                                    class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500 @error('status') border-red-500 @enderror">
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Product Images -->
                    <div>
                        <label for="images" class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                            Hình Ảnh Sản Phẩm
                        </label>
                        <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center hover:border-brand-500 transition-colors">
                            <input type="file" 
                                   id="images" 
                                   name="images[]" 
                                   multiple 
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewImages(this)">
                            <label for="images" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    <span class="font-medium text-brand-500 hover:text-brand-400">Click để chọn</span> hoặc kéo thả hình ảnh vào đây
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF tối đa 10MB</p>
                            </label>
                        </div>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-4 hidden">
                            <!-- Preview images will be inserted here -->
                        </div>
                        
                        @error('images')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('admin.products.index') }}" 
                           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Hủy
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-5 py-3 text-sm font-medium text-white hover:bg-brand-600">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Thêm Sản Phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-12 xl:col-span-4">
            <!-- Product Info Card -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 mb-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">
                    Thông Tin Sản Phẩm
                </h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Tên sản phẩm phải rõ ràng và dễ hiểu</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Giá sản phẩm phải hợp lý</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-400">Hình ảnh chất lượng cao</span>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">
                    Thống Kê Nhanh
                </h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Tổng sản phẩm</span>
                        <span class="text-sm font-medium text-gray-800 dark:text-white">0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Sản phẩm hoạt động</span>
                        <span class="text-sm font-medium text-gray-800 dark:text-white">0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Sản phẩm mới hôm nay</span>
                        <span class="text-sm font-medium text-brand-500">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImages(input) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        preview.classList.remove('hidden');
        
        Array.from(input.files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'relative group';
                    div.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}" class="w-full h-24 object-cover rounded-lg">
                        <button type="button" onclick="removeImage(this)" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600">
                            ×
                        </button>
                    `;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        });
    } else {
        preview.classList.add('hidden');
    }
}

function removeImage(button) {
    button.parentElement.remove();
    const preview = document.getElementById('imagePreview');
    if (preview.children.length === 0) {
        preview.classList.add('hidden');
    }
}
</script>
@endsection
