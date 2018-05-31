teams = [];
skip = [
    "Statistics",
    "References",
    "Coaches_representation_by_country",
    "External_links"
];
$(".mw-headline").each((index, el) => {
    el = $(el);
    let id = el.attr("id");
    if (id.match(/Group/) || skip.includes(id)) return;
    teams.push(id);
});
wc = {};
teams.map(team => {
    wc[team] = getPlayersForTeam(team);
});
console.log(wc);
function getPlayersForTeam(team) {
    dom = $(`#${team}`)
        .parent()
        .next()
        .next()
        .next()
        .find("tr");
    players = [];
    dom.each((index, el) => {
        if (!index) return;
        player = $(el);
        players.push({
            position: player.find("td:nth-child(2)").text(),
            name: player.find("th").text(),
            dob: player.find("td:nth-child(4)").text(),
            caps: player.find("td:nth-child(5)").text(),
            goals: player.find("td:nth-child(6)").text(),
            club: player.find("td:nth-child(7)").text()
        });
    });
    return players;
}
