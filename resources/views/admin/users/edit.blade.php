@extends('layouts.admin')

@section('header', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Role Akses</label>
                <select name="role" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User Biasa</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrator</option>
                </select>
            </div>

            <div class="pt-4 border-t border-gray-100">
                <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Password (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengganti" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-[#FACC15] outline-none">
            </div>

            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 rounded-xl text-gray-600 hover:bg-gray-100 font-bold transition">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#FACC15] text-[#0F172A] font-bold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition">Update User</button>
            </div>

        </form>
    </div>
</div>
@endsection