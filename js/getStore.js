function loadStores() {
    const regionSelect = document.getElementById('inputRegion');
    const storeSelect = document.getElementById('inputHomeStore');

    storeSelect.innerHTML = '<option selected value="">Select a home store</option>';

    const selectedRegion = regionSelect.value;

    let stores = [];

    switch (selectedRegion) {
        case 'CENTRAL':
            stores = [

            ];
            break;
        case 'EAST':
            break;
        case 'NW':
            break;
        case 'OTTAWA':
            break;
        case 'QUEBEC':
            stores = [
                'FPC', 'SCS', 'GDA', 'CFL', 'MCP', 'MEC', 'SCO', 'WTC', 'CAN', 'PSB', 'BSN'
            ];
            break;
        case 'SOUTH':
            break;
        case 'SW1':
            break;
        case 'SW2':
            break;
        case 'USA':
            break;
        default:
            break;
    }

    stores.forEach(store => {
        const option = document.createElement('option');
        option.value = store;
        option.textContent = store;
        storeSelect.appendChild(option);
    });
}