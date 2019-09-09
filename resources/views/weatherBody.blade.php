@extends('weatherIndex')
@section('body')

    <div class="row" style="background-color: #b3e8ca;padding: 20px">
        <div class="col-md-5">
            <img style="width:auto"
                 src="http://openweathermap.org/img/wn/{{$dataNow->weather[0]->icon}}@2x.png"
                 class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <p class="h4" style="color: #b91d19"> {{$dataNow->name}}</p>
                </div>

                <div class="col-md-6">
                    <p class="h5" style="padding-left: 0px; color: #b91d19">
                        <script>
                            var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();

                            today = mm + '/' + dd + '/' + yyyy;
                            document.write(today);

                        </script>
                    </p>
                </div>
            </div>
            <div class="row">

                <table class="table">
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{$dataNow->weather[0]->main}}</td>
                    </tr>
                    <tr>
                        <th scope="row"> Temp</th>
                        <td> {{$dataNow->main->temp -273}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Pressure</th>
                        <td>{{$dataNow->main->pressure}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Wind</th>
                        <td>{{$dataNow->wind->speed}}</td>
                    </tr>

                </table>

            </div>
        </div>
    </div>


    <div class="row" style="background-color: #fcf8e3;padding: 20px">
        <div class="row">
            <h2 style="padding-left: 50px"> Weather by times:</h2>
        </div>
        <div class="row" style="padding-left: 80px;padding-left: 20px">
            @foreach($dataFiveDay as $item)
                <div class="col-md-2" style="margin: 10px">
                    <table class="table" >
                        <tr>
                            <th scope="row">Time</th>
                            <td>{{$item->dt_txt}}</td>
                        </tr>
                        <tr>
                            <td>
                                <img style="width:auto"
                                     src="http://openweathermap.org/img/wn/{{$item->weather[0]->icon}}@2x.png"
                                     class="img-fluid" alt="Responsive image">
                            </td>

                            <td>{{$item->weather[0]->main}}</td>
                        </tr>
                        <tr>
                            <th scope="row"> Temp</th>
                            <td> {{$item->main->temp-273}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pressure</th>
                            <td>{{$item->main->pressure}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Wind</th>
                            <td>{{$item->wind->speed}}</td>
                        </tr>

                    </table>

                </div>

            @endforeach
        </div>

    </div>



@endsection
