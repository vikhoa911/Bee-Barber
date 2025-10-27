@extends('admins.layouts.index')

@section('content')
    <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
        <!-- Header -->
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-title-md2 font-semibold text-gray-800 dark:text-white">
                    Quản Lý Sản Phẩm
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Quản lý tất cả sản phẩm trong hệ thống
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.products.create') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-5 py-3 text-sm font-medium text-white hover:bg-brand-600">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Thêm Sản Phẩm
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Products -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-100 dark:bg-brand-500/20">
                    <svg class="fill-brand-500" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z"
                            fill="" />
                    </svg>
                </div>
                <div class="mt-5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Tổng Sản Phẩm</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">0</h4>
                </div>
            </div>

            <!-- Active Products -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-success-100 dark:bg-success-500/20">
                    <svg class="fill-success-500" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                            fill="" />
                    </svg>
                </div>
                <div class="mt-5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Đang Hoạt Động</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">0</h4>
                </div>
            </div>

            <!-- Inactive Products -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-error-100 dark:bg-error-500/20">
                    <svg class="fill-error-500" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"
                            fill="" />
                    </svg>
                </div>
                <div class="mt-5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Không Hoạt Động</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">0</h4>
                </div>
            </div>

            <!-- Low Stock -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-warning-100 dark:bg-warning-500/20">
                    <svg class="fill-warning-500" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 2l9 20H3l9-20zm0 3.84L4.5 20h15L12 5.84zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z"
                            fill="" />
                    </svg>
                </div>
                <div class="mt-5">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Sắp Hết Hàng</span>
                    <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">0</h4>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <!-- Search -->
                <div class="relative w-full lg:w-80">
                    <input type="text" placeholder="Tìm kiếm sản phẩm..."
                        class="w-full rounded-lg border border-gray-300 bg-transparent px-5 py-3 pl-12 text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500">
                    <svg class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-3">
                    <select
                        class="rounded-lg border border-gray-300 bg-transparent px-4 py-2 text-sm text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500">
                        <option value="">Tất cả danh mục</option>
                        <option value="1">Cắt Tóc</option>
                        <option value="2">Gội Đầu</option>
                        <option value="3">Massage</option>
                        <option value="4">Chăm Sóc Da</option>
                    </select>

                    <select
                        class="rounded-lg border border-gray-300 bg-transparent px-4 py-2 text-sm text-gray-800 outline-none transition focus:border-brand-500 focus:ring-1 focus:ring-brand-500 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:focus:border-brand-500">
                        <option value="">Tất cả trạng thái</option>
                        <option value="active">Hoạt động</option>
                        <option value="inactive">Không hoạt động</option>
                    </select>

                    <button
                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z">
                            </path>
                        </svg>
                        Lọc
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-gray-200 dark:border-gray-800">
                        <tr>
                            <th class="px-5 py-4 text-left">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Sản Phẩm</span>
                            </th>
                            <th class="px-5 py-4 text-left">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Danh Mục</span>
                            </th>
                            <th class="px-5 py-4 text-left">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Giá</span>
                            </th>
                            <th class="px-5 py-4 text-left">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Tồn Kho</span>
                            </th>
                            <th class="px-5 py-4 text-left">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Trạng Thái</span>
                            </th>
                            <th class="px-5 py-4 text-center">
                                <span class="text-sm font-medium text-gray-800 dark:text-white">Thao Tác</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">
                                <div class="mx-auto max-w-sm">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <h3 class="mt-4 text-lg font-medium text-gray-800 dark:text-white">Chưa có sản phẩm nào
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                        Bắt đầu bằng cách thêm sản phẩm đầu tiên của bạn.
                                    </p>
                                    <div class="mt-6">
                                        <a href="{{ route('admin.products.create') }}"
                                            class="inline-flex items-center justify-center rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Thêm Sản Phẩm
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
