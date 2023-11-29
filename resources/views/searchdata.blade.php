<!-- Your HTML file with the dropdown and JavaScript -->

<select id="columns" name="selected_column">
    <option value="" disabled>Filter Kepagawaian</option>
    <option value="column1">Active</option>
    <option value="column2">Non Active</option>
    <!-- Add more options as needed -->
</select>

<button type="button" onclick="filter()">Filter</button>

<script>
    function filter() {
        var selectedColumn = document.getElementById("columns").value;

        // Make your API request with the selected column
        // For example, using fetch or AJAX
        // Update the API endpoint based on your Laravel routes
        fetch(`http://127.0.0.1:8000/searchdata?selected_column=${selectedColumn}`)
            .then(response => response.json())
            .then(data => {
                // Handle the API response data
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
