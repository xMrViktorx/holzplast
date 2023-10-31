@extends('admin::layouts.navigation')

@section('content')
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6 text-2xl">
                        <a href="{{ route('admin.user.create') }}"><i class="ri-add-circle-line"></i></a>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Név
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Létrehozva
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Akciók
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->id }}#
                        </th>
                        <td class="py-4 px-6">
                            {{ $user->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $user->created_at }}
                        </td>
                        <td class="py-4 px-6 flex text-2xl">
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="font-medium mr-3"><i class="ri-edit-line"></i>
                            </a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="post" onsubmit="return confirm('Biztosan törölni szeretné ezt a felhasználót?');">
                                @method('DELETE')
                                @csrf
                                <button type="submit"><i class="ri-delete-bin-6-line"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
