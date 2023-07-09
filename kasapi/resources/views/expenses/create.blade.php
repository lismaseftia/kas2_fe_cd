<form action="{{ route('expenses.store') }}" method="POST">
    @csrf
    <div>
        <label for="amount">Jumlah Uang:</label>
        <input type="number" name="amount" id="amount">
    </div>
    <div>
        <label for="description">Deskripsi:</label>
        <input type="text" name="description" id="description">
    </div>
    <button type="submit">Simpan</button>
</form>
