@extends('layouts.app')

@section('content')
    <div id="app">
        <form @submit.prevent="createCar">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="car.name">
            </div>
            <div>
                <label for="brand">Brand:</label>
                <input type="text" id="brand" v-model="car.brand">
            </div>
            <div>
                <label for="color">Color:</label>
                <input type="text" id="color" v-model="car.color">
            </div>
            <div>
                <label for="year">Year:</label>
                <input type="number" id="year" v-model="car.year">
            </div>
            <button type="submit">Create Car</button>
        </form>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                car: {
                    name: '',
                    brand: '',
                    color: '',
                    year: ''
                }
            },
            methods: {
                createCar() {
                    // Send the car data to the server for processing
                    // You can use Axios or any other HTTP library to make the request
                    // Example: axios.post('/cars', this.car)
                }
            }
        });
    </script>
@endsection
