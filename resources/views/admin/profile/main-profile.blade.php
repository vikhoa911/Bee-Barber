@extends('admin.layouts.app')

@section('title', 'Profile')

@section('content')
    <main>
        <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            <div x-data="{
                        isProfileAvatarModal: false,
                        isProfileInfoModal: false,
                        isProfileAddressModal: false,
                        }">
                @include('admin.profile.section.edit-section', ['user' => $user])
                @include('admin.profile.modals.avatar-modal', ['user' => $user])
                @include('admin.profile.modals.info-modal', ['user' => $user])
                @include('admin.profile.modals.address-modal',['user' => $user])
            </div>
        </div>
    </main>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection
