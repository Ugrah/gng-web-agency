var getAmountFromQuestion = function(){
    var questionsAmounts = [
        {qualityOptionRadio1: 2400, qualityOptionRadio2: 1600, qualityOptionRadio3: 800},
        {typeOptionRadio1: 1800, typeOptionRadio2: 1800, typeOptionRadio3: 3600},
        {designOptionRadio1: 2400, designOptionRadio2: 7200, designOptionRadio3: 4800, designOptionRadio4: 500},
        {profitableOptionRadio1: 300, profitableOptionRadio2: 300, profitableOptionRadio3: 2400, profitableOptionRadio4: 600},
        {loginOptionRadio1: 2400, loginOptionRadio2: 1500, loginOptionRadio3: 0, loginOptionRadio4: 1200},
        {userSpaceOptionRadio1: 2400, userSpaceOptionRadio2: 0, userSpaceOptionRadio3: 1200},
        {websiteIntagrationOptionRadio1: 2400, websiteIntagrationOptionRadio2: 0, websiteIntagrationOptionRadio3: 1200},
        {adminSpaceOptionRadio1: 2400, adminSpaceOptionRadio2: 0, adminSpaceOptionRadio3: 1200},
        {languageOptionRadio1: 0, languageOptionRadio2: 1200, languageOptionRadio3: 2400},
        {advancedFeaturesOptionRadio1: 2400, advancedFeaturesOptionRadio2: 0, advancedFeaturesOptionRadio3: 1200},
        {statusProjectOptionRadio1: 0, statusProjectOptionRadio2: 0, statusProjectOptionRadio3: 0, statusProjectOptionRadio4: 0}
    ];
    return questionsAmounts;
}

var getDevise = function(){
    var devise = {name: 'Dirham Marocain', symbol: 'Dh'};
    return devise;
}