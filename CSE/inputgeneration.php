<input type="number" id="numInputs" placeholder="NO OF LONG QUESTIONS "  name="numInputs" min="1" max="10" required oninput="generateInputs()" style="width:100%; border:none; background: transparent; outline:none; border: solid 0.5px black; border-radius: 5px; height: 30px; padding: 5px;" >

<div id="inputContainer">
            

        </div>

        function generateInputs() {
    // Clear previous inputs
    document.getElementById('inputContainer').innerHTML = '';

    // Get the number of inputs from the user
    var numInputs = document.getElementById('numInputs').value;

    // Generate new input elements
    for (var i = 0; i < numInputs; i++) {
        var inputElement = document.createElement('input');
        inputElement.type = 'text';
        inputElement.name = 'generatedInput[]'; // Use an array if submitting to a server
        inputElement.placeholder = 'Input ' + (i + 1);
        inputElement.className='longque'

        // Append the new input to the container
        document.getElementById('inputContainer').appendChild(inputElement);
    }
}