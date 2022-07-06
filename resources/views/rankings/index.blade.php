@extends('layouts.app')
@section('content')
<div class="container-xl py-4">
    <div class="container">
        <div class="row py-3">
            <h2 class="page-title text-center">Classements</h2>
        </div>
        <div class="row py-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <thead>
                          <tr >
                            <th scope="col" class="">ID</th>
                            <th scope="col" class="">Nom</th>
                            {{-- <th scope="col" class="text-center">Nombre de parties</th> --}}
                            <th scope="col" class="text-center">Meilleur cumul</th>
                            <th scope="col" class="text-center">Moins bon cumul</th>
                            {{-- <th scope="col" class="text-center">Meilleur %</th>
                            <th scope="col" class="text-center">Moins bon %</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                            {{-- {{dd($userData[0]->gm_results)}} --}}
                            @forelse ($userData as $user)
                            <tr>
                                {{-- {{dd($user)}} --}}
                                <th scope="row">
                                   {{$user->id}}
                                </th>
                                <td class="">
                                    {{$user->name}}
                                </td>
                                {{-- <td class="text-center">
                                    {{$user->user_count ?? 0}}
                                </td> --}}
                                <td class="text-center">
                                    @forelse ($user->gm_results as $result )
                                       {{$result->player_max}}
                                   @empty
                                       0
                                   @endforelse
                                </td>
                                <td class="text-center">
                                    @forelse ($user->gm_results as $result )
                                       {{$result->player_min}}
                                   @empty
                                       0
                                   @endforelse
                                </td>
                                {{-- <td class="text-center"></td>
                                <td class="text-center"></td> --}}
                              </tr>
                            @empty
                                <tr>
                                    <td>No data</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection