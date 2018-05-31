// this will save latest players.json to storage/json/players.json
const puppeteer = require("puppeteer");
const filePath = `${__dirname}/../storage/json/players.json`;
(async () => {
    // console.log(filePath);
    // return;
    const browser = await puppeteer.launch({
        headless: false
    });
    console.log(new Date().toString(), " started scrapping");
    const page = await browser.newPage();
    await page.goto(
        "https://en.wikipedia.org/wiki/2018_FIFA_World_Cup_squads",
        {
            waitUntil: "domcontentloaded"
        }
    );
    const content = await page.evaluate(scrapData);
    console.log(new Date().toString(), " writing to file");

    await writeToFile(content);
    // if (content) {
    // }
    // console.log(content);
    // await page.screenshot({ path: "example.png" });

    await browser.close();
})();

function scrapData() {
    try {
        const teams = [];
        const skip = [
            "Statistics",
            "References",
            "Coaches_representation_by_country",
            "External_links"
        ];
        $(".mw-headline").each((index, el) => {
            el = $(el);
            var id = el.attr("id");
            if (id.match(/Group/) || skip.includes(id)) return;
            teams.push(id);
        });
        var wc = {};
        var prevGroup = "";
        teams.map(team => {
            var groupText = $(`#${team}`)
                .parent()
                .prev()
                .text();
            if (groupText.match(/^Group/)) {
                prevGroup = groupText;
            }
            wc[team] = { players: getPlayersForTeam(team), group: prevGroup };
        });

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

        return wc;
    } catch (e) {
        return {};
    }
}
function writeToFile(content) {
    return new Promise((resolve, reject) => {
        const fs = require("fs");
        fs.writeFile(filePath, JSON.stringify(content), "utf8", function(
            err,
            resp
        ) {
            if (err) {
                console.log(
                    new Date().toString(),
                    " Error while writing ",
                    err
                );
            } else {
                console.log(new Date().toString(), "file written successfully");
            }
            // console.log(err, resp);
            resolve();
        });
    });
    // content = JSON.stringify(content);
    // console.log(content);
}
