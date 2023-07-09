<form action="{{ route('income.store') }}" method="POST">
    @csrf

    <div>
        <label for="amount">Jumlah Uang Masuk:</label>
        <input type="number" name="amount" id="amount" required>
    </div>

    <div>
        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <button type="submit">Tambah Uang Masuk</button>
</form>
