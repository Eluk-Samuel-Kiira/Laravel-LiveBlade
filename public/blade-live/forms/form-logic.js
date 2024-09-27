// form-logic.js
import LiveBladeResponse from '../responses/liveblade-responses.js';


const formLogic = {
    load(routeName, method = 'GET', data = {}, targetSelector, componentToReload='') {

        const url = window.routes[routeName];
        // console.log(method);
    
        if (!url) {
            console.error(`Route "${routeName}" not found.`);
            return;
        }
    
        // Prepare fetch options
        const options = {
            method: method,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        };
    
        // If the method is POST, PUT, PATCH, or DELETE, add the data as a JSON string in the body
        if (['POST', 'PUT', 'PATCH', 'DELETE'].includes(method.toUpperCase())) {
            options.body = JSON.stringify(data);
        }

        // Fetch content and delegate response handling to LiveBladeResponse
        fetch(url, options)
            .then(response => {
                // If the response is not successful (like 422 Unprocessable Entity), throw the error
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw errorData; // Throw the error data to be caught by .catch()
                    });
                }
                // If response is successful, return the data as JSON
                return response.json();
            })
            .then(data => {
                // Delegate response handling to LiveBladeResponse
                LiveBladeResponse.processResponse(data, document.querySelector(targetSelector), componentToReload);
            })
            .catch(error => {
                // Handle validation errors (422 response)
                if (error.errors) {
                    LiveBladeResponse.displayValidationErrors(error.errors);
                    return;
                }

                // Display error with detailed information
                formLogic.handleError(error);
            });
    },

    handleError(error) {
        let errorMessage = `
        <table border="1" cellpadding="5" cellspacing="0" style="width:100%;border-collapse:collapse;text-align:left;">
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    padding: 10px;
                    text-align: left;
                    border: 1px solid #ddd;
                    vertical-align: top; /* Ensure content aligns properly */
                }
                th {
                    background-color: #f8f8f8;
                    color: #333;
                    font-weight: bold;
                    width: 20%; /* Set the width for the first column */
                }
                td {
                    background-color: #fafafa;
                    color: #555;
                    width: 80%; /* Set the width for the second column */
                }
                tr:nth-child(even) td {
                    background-color: #f2f2f2; /* Lighter background for even rows */
                }
                
                /* Styling for the inner trace table */
                table.trace-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 10px; /* Add a margin between inner and outer tables */
                }
                table.trace-table th, table.trace-table td {
                    padding: 8px; /* Adjust padding to be smaller for trace table */
                    border: 1px solid #ddd;
                    text-align: left;
                    vertical-align: top;
                }
                table.trace-table th {
                    background-color: #e8e8e8;
                    color: #000;
                    font-weight: bold;
                }
                table.trace-table td {
                    background-color: #f9f9f9;
                    color: #555;
                }
                table.trace-table tr:nth-child(even) td {
                    background-color: #f0f0f0; /* Lighter background for even rows */
                }
                
                /* Set column widths for the inner trace table */
                table.trace-table th:nth-child(1),
                table.trace-table td:nth-child(1) {
                    width: 5%; /* Index */
                }
                table.trace-table th:nth-child(2),
                table.trace-table td:nth-child(2) {
                    width: 60%; /* File path */
                }
                table.trace-table th:nth-child(3),
                table.trace-table td:nth-child(3) {
                    width: 10%; /* Line number */
                }
                table.trace-table th:nth-child(4),
                table.trace-table td:nth-child(4) {
                    width: 25%; /* Function name */
                }
            </style>

        `;
    
        // Check for various properties and build the error message in table rows
        if (error.message) {
            errorMessage += `<tr><th>Message</th><td>${error.message}</td></tr>`;
        }
        if (error.exception) {
            errorMessage += `<tr><th>Exception</th><td>${error.exception}</td></tr>`;
        }
        if (error.file) {
            errorMessage += `<tr><th>File</th><td>${error.file}</td></tr>`;
        }
        if (error.line) {
            errorMessage += `<tr><th>Line</th><td>${error.line}</td></tr>`;
        }
        
        // Handle trace array of objects in a separate table section
        if (error.trace && Array.isArray(error.trace)) {
            errorMessage += `
                <tr><th>Trace</th><td>
                    <table class="trace-table" border="1" cellpadding="5" cellspacing="0">
                        <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Line</th>
                            <th>Function</th>
                        </tr>
            `;
    
            error.trace.forEach((traceObj, index) => {
                errorMessage += `
                    <tr>
                        <td>${index}</td>
                        <td>${traceObj.file || 'unknown file'}</td>
                        <td>${traceObj.line || 'unknown line'}</td>
                        <td>${traceObj.function || 'unknown function'}</td>
                    </tr>
                `;
            });
    
            errorMessage += `</table></td></tr>`;
        }
        
        errorMessage += `</table>`;
    
        // Display the constructed error message using SweetAlert2
        LiveBladeResponse.displayErrorMessage(errorMessage);
    }
    
    

};

// Export the implementation for internal use
export default formLogic;
