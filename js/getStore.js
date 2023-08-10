function loadStores() {
    const regionSelect = document.getElementById('inputRegion');
    const storeSelect = document.getElementById('inputHomeStore');

    storeSelect.innerHTML = '<option selected value="">Select a home store</option>';

    const selectedRegion = regionSelect.value;

    let stores = [];

    switch (selectedRegion) {
        case 'CENTRAL':
            stores = [
                'NYKD', 'FV', 'B223', '#6', 'AG', 'PW', '#18', 'SWD', '#39', '#72', 'RMP', '#6464Y', 'HCM', 'AMP', 'UCM', 'MKV', 'UV'
            ];
            break;
        case 'EAST':
            stores = [
                'STC', 'CW', 'PTC', 'OC', 'STM', 'YSC', 'EPW', 'KAW', 'CQC'   
            ];
            break;
        case 'NW':
            stores = [
                'BCC', 'SPW', 'WB', 'PPB', 'AL', 'TPO', 'RCB', 'VM', 'GGM'
            ];
            break;
        case 'OTTAWA':
            stores = [
                'BSC', 'SLT', 'RDC', 'PDO', 'BLB', 'TOO', 'RCO', 'BAF', 'SSC'
            ];
            break;
        case 'QUEBEC':
            stores = [
                'FPC', 'SCS', 'GDA', 'CFL', 'MCP', 'MEC', 'SCO', 'WTC', 'CAN', 'PSB', 'BSN', 'CDD'
            ];
            break;
        case 'SOUTH':
            stores = [
                'TEC', '223Q', 'CLP', '#660', '#167', 'K9', 'LS', 'ES', '#108', 'DFM', '#60', 'PMH'
            ];
            break;
        case 'SW1':
            stores = [
                'RW', 'SQ1', 'SC', 'DX', 'EM', 'CVP', 'OV', 'BLT', 'BPV'
            ];
            break;
        case 'SW2':
            stores = [
                'LR', 'FVP', 'MVP', 'EGS', 'CBC', 'SRM', 'WOM', 'GKS', 'CTG', 'FSC', 'MVC', 'OCM', 'TPC', 'DVS'
            ];
            break;
        case 'USA':
            stores = [
                'GSP', 'BWC', 'WBC', 'MLP', 'NPC', 'MSH', 'ADM', 'MJG', 'CHM', 'HSC', 'CTM', 'JSS', 'WLB', 'FRM', 'PMM', 'RWT', 'KOP', 'GAM', 'PPO'
            ];
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