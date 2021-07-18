<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'aap','role','idref','orcid','prenom','nom','genre','iso_country','pays','code_affiliation','affiliation',
    ];
}

Route::get('/jurries', 'JurryController@getAll');
Route::get('/jurries/{id}', 'JurryController@getWithLimit');
Route::get('/expert', 'JurryController@lentFunction');
Route::post('/create', 'JurryController@store');
Route::delete('/delete/{id}','JurryController@destroy');

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todolist;
use App\Jurry;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\PayUService\Exception;

class JurryController extends Controller
{

    public function getWithLimit($id)
    {
        try {
            $jurries = DB::table('jurries')->limit($id)->get();
            return response()->json($jurries, 200);
        } catch (\Exception $e) {

            return response()->json($e, 400);
        }

    }

    public function getAll()
    {
        try {
            $jurries = DB::table('jurries')->get();
            return response()->json($jurries, 200);
        } catch (\Exception $e) {

            return response()->json($e, 400);
        }
    }

    public function destroy($id)
    {
        try {
            $jurry = Jurry::find($id);
            $jurry->delete();
            return response()->json("jurry supprime", 200);
        } catch (\Exception $e) {

            return response()->json($e, 400);
        }
    }

    public function lentFunction()
    {
        try {
            $jurries = DB::table('jurry')->get();
            $filterJurries[] = 0;
            foreach ($jurries as $jury) {
                if ($jury->role == 'Expert.e') {
                    array_push($filterJurries, $jury);
                }
            }
            return response()->json($filterJurries, 200);
        } catch (\Exception $e) {

            return response()->json($e, 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $jury = new Jurry;
            $jury->aap = $request->get('aap');
            $jury->role = $request->get('role');
            $jury->idref = $request->get('idref');
            $jury->orcid = $request->get('orcid');
            $jury->prenom = $request->get('prenom');
            $jury->nom = $request->get('nom');
            $jury->genre = $request->get('genre');
            $jury->iso_courntry = $request->get('iso_courntry');
            $jury->pays = $request->get('pays');
            $jury->code_affiliation = $request->get('code_affiliation');
            $jury->affiliation = $request->get('affiliation');
            $jury->save();
            return response()->json("jury created", 200);
        } catch (\Exception $e) {

            return response()->json($e, 400);
        }
    }

}

