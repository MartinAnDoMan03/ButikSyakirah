@extends('layouts.layoutadmin')

@section('title', 'Pengguna')

@section('content')
    <h1>Daftar Akun Pengguna</h1>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>No. Hp</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="javascript:void(0)" class="btn btn-edit-user" onclick="openEditUserModal('{{ $user->user_id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone_number }}', '{{ $user->role }}')">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit User -->
    <div id="editUserModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close-btn" onclick="closeEditUserModal()">&times;</span>
            
            <h2>Edit Pengguna</h2>
            <form action="{{ url('update-user') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_user_id" name="user_id">
                
                <div>
                    <label for="edit_user_name">Nama Pengguna:</label>
                    <input type="text" id="edit_user_name" name="name" required>
                </div>

                <div>
                    <label for="edit_user_email">Email:</label>
                    <input type="email" id="edit_user_email" name="email" required>
                </div>

                <div>
                    <label for="edit_user_phone">No. Hp:</label>
                    <input type="text" id="edit_user_phone" name="phone_number" required>
                </div>

                <div>
                    <label for="edit_user_role">Posisi:</label>
                    <select id="edit_user_role" name="role" required>
                        <option value="kasir">Kasir</option>
                        <option value="penggunting">Penggunting</option>
                        <option value="penjahit">Penjahit</option>
                        <option value="pemayet">Pemayet</option>
                    </select>
                </div>

                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditUserModal(userId, name, email, phone, role) {
            document.getElementById('edit_user_id').value = userId;
            document.getElementById('edit_user_name').value = name;
            document.getElementById('edit_user_email').value = email;
            document.getElementById('edit_user_phone').value = phone;
            document.getElementById('edit_user_role').value = role;
            document.getElementById('editUserModal').style.display = 'block';
        }

        function closeEditUserModal() {
            document.getElementById('editUserModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('editUserModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        };
    </script>

@endsection
