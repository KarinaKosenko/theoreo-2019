<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\AddCountry;
use App\Http\Requests\AddRegion;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Support\Str;

class LocationController {
	protected $folderPath = 'admin.location.';

	public function formAddCountry() {
		return view( $this->folderPath . 'formAddCountry' );
	}

	public function formAddRegion() {
		$countries = Country::orderBy( 'created_at', 'desc' )->get();

		return view( $this->folderPath . 'formAddRegion', [ 'countries' => $countries ] );
	}

	public function formAddCity() {
		$regions = Region::orderBy( 'created_at', 'desc' )->get();

		return view( $this->folderPath . 'formAddCity', [ 'regions' => $regions ] );
	}

	public function addCountry( AddCountry $request ) {

		$countryName = $request->input( 'name' );
		$code        = Str::slug( $countryName, '-' );

		$addCountry = Country::create( [
			'name' => $countryName,
			'code' => $code
		] );

		if ( $addCountry ) {
			$message = 'Страна успешно добавлена!';
		} else {
			$message = 'Не удалось добавить страну, попробуйте еще раз!';
		}

		return view( $this->folderPath . 'formAddCountry', [ 'message' => $message ] );

	}

	public function addRegion( AddRegion $request ) {
		$countries  = Country::orderBy( 'created_at', 'desc' )->get();
		$regionName = $request->input( 'name' );
		$countryID  = $request->input( 'country_id' );
		$code       = Str::slug( $regionName, '-' );

		$addRegion = Region::create( [
			'name'       => $regionName,
			'code'       => $code,
			'country_id' => $countryID
		] );

		if ( $addRegion ) {
			$message = 'Регион успешно добавлен!';
		} else {
			$message = 'Не удалось добавить регион, попробуйте еще раз!';
		}

		return view( $this->folderPath . 'formAddRegion', [ 'message' => $message, 'countries' => $countries ] );

	}

	public function addCity( AddRegion $request ) {
		$regions  = Region::orderBy( 'created_at', 'desc' )->get();
		$cityName = $request->input( 'name' );
		$regionID = $request->input( 'region_id' );
		$code     = Str::slug( $cityName, '-' );

		$addCity = City::create( [
			'name'      => $cityName,
			'code'      => $code,
			'region_id' => $regionID
		] );

		if ( $addCity ) {
			$message = 'Город успешно добавлен!';
		} else {
			$message = 'Не удалось добавить город, попробуйте еще раз!';
		}

		return view( $this->folderPath . 'formAddCity', [ 'message' => $message, 'regions' => $regions ] );

	}


}