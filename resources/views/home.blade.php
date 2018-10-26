@extends('layouts.app')

@section('content')
    <div class="container is-fluid">

        <section class="section">
            <form id="searchForm" action="{{route('home')}}" method="get">
                <div class="field is-grouped">
                    <p class="control">
                        <span class="select">
                            <select name="limit" id="limitSelect">
                                @foreach ($limitOptions as $key => $limitOption)
                                    @if ($limit == $limitOption)
                                        <option value="{{$limitOption}}" selected>{{$limitOption}}</option>
                                    @else
                                        <option value="{{$limitOption}}">{{$limitOption}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </span>
                    </p>
                    <p class="control">
                        <span class="select">
                            <select name="orderBy" id="orderBySelect">
                                @foreach ($orderByOPtions as $key => $orderByOPtion)
                                    @if ($orderBy == $orderByOPtion)
                                        <option value="{{$orderByOPtion}}" selected>{{$orderByOPtion}}</option>
                                    @else
                                        <option value="{{$orderByOPtion}}">{{$orderByOPtion}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </span>
                    </p>

                    <p class="control">
                        <span class="select">
                            <select name="sortOrder" id="sortOrderSelect">
                                @foreach ($sortOrderOPtions as $key => $sortOrderOPtion)
                                    @if ($sortOrder == $sortOrderOPtion)
                                        <option value="{{$sortOrderOPtion}}" selected>{{$sortOrderOPtion}}</option>
                                    @else
                                        <option value="{{$sortOrderOPtion}}">{{$sortOrderOPtion}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </span>
                    </p>
                </div>
                <div class="field is-grouped">


                    <p class="control is-expanded">
                        <input class="input" type="text" placeholder="Search Name" name="search" value="{{$search}}">
                    </p>
                    <p class="control">
                        <button type="submit" class="button is-info">
                            Search
                        </button>
                    </p>
                </div>
            </form>
            <div class="columns">
                <div class="column">
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <td>{{$model->name}}</td>
                                    <td>{{$model->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $models->appends(['search' => $search, 'sortOrder' => $sortOrder, 'orderBy' => $orderBy])->links('vendor.pagination.bulma') }}
        </section>
    </div>
@endsection
