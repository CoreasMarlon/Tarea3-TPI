(() => {
    const departamentosSelect = document.getElementById('departamento')
    departamentosSelect.addEventListener('change', async (event) => {
        const municipiosSelectInput = document.getElementById('municipio')
        const departamentoId = document.getElementById('departamento').value
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        }
        const request = await fetch(`/Tarea3-TPI/filter.php?departamento=${departamentoId}`)
        const selectOptions = await request.text()
        municipiosSelectInput.innerHTML = selectOptions
    })
})()