/* Function to change content on mouseover */
function changeContent(type) {
  if (type === "trophy") {
    document.getElementById("trophy-text").innerText = "The Ultimate Prize!";
    document.getElementById("trophy-img").src = "trophy_hover.jpg";
  } else if (type === "mom") {
    document.getElementById("mom-text").innerText = "Best Performance!";
    document.getElementById("mom-img").src = "rachin.jpg";
  } else if (type === "wickets") {
    document.getElementById("wickets-text").innerText = "Unstoppable Bowler!";
    document.getElementById("wickets-img").src = "mat.jpeg";
  } else if (type === "runs") {
    document.getElementById("runs-text").innerText = "Top Scorer!";
    document.getElementById("runs-img").src = "rachin.jpg";
  }
}

/* Function to reset content on mouseout */
function resetContent(type) {
  if (type === "trophy") {
    document.getElementById("trophy-text").innerText = "Champions Trophy";
    document.getElementById("trophy-img").src = "champions.png";
  } else if (type === "mom") {
    document.getElementById("mom-text").innerText = "Man of the tournament";
    document.getElementById("mom-img").src = "mom.jpeg";
  } else if (type === "wickets") {
    document.getElementById("wickets-text").innerText = "Highest Wicket Taker";
    document.getElementById("wickets-img").src = "ball.png";
  } else if (type === "runs") {
    document.getElementById("runs-text").innerText = "Leading Run Scorer";
    document.getElementById("runs-img").src = "bats.jpg";
  }
}
