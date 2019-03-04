
<form method="post" action="/todos-ajax/{{ $id }}">
	
	<!-- them the input cos value=put vi html ko co put  -->
	<!-- <input type="hidden" name="_method" value="put"> -->  <!-- cho update -->

	<input type="hidden" name="_method" value="delete">     <!-- cho delete -->

    @csrf
    <h1>sds</h1>
    <button>Submit</button>
</form>