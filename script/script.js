$(document).ready(function () {
  $("#attendentType").change(function () {
    $("#attendentTypeForm").submit();
  });

  // ------------------------- to Committee Members data ------------------------------------------------------------

  $.getJSON("./data/committee_data.json", function (data) {
    const container = $("#committee-container");

    $.each(data, function (committeeName, members) {
      const section = $('<div class="committee-section col-12"></div>');
      section.append(`<div class="section-title">${committeeName}</div>`);

      const row = $('<div class="row"></div>');

      $.each(members, function (i, member) {
        const card = $(`
            <div class="col-md-4 col-sm-6">
              <div class="custom-card cursor-pointer text-center" 
              onclick="window.location.href='${member.link}'"
              >
                <img src="${member.image}" alt="${member.name}" class="member-img mb-3">
                <h5>${member.name}</h5>
                <p>${member.affiliation}</p>
              </div>
            </div>
          `);
        row.append(card);
      });

      section.append(row);
      container.append(section);
    });
  });

  // ------------------------- to display speakers data ------------------------------------------------------------

  $.getJSON("./data/invited_speaker_data.json", function (data) {
    const container = $("#speakers-container");

    data.speakers.forEach((speaker, index) => {
      const tagClass =
        speaker.speakerType === "fixed" ? "tag-fixed" : "tag-tentative";

      const interests = speaker.researchInterests || [];
      const interestsPreview = interests
        .slice(0, 3)
        .map((i) => `<li>${i}</li>`)
        .join("");

      const interestsHidden = interests
        .slice(3)
        .map((i) => `<li class="hidden-interest hidden-${index}">${i}</li>`)
        .join("");

      const showMoreBtn =
        interests.length > 3
          ? `<button class="show-more" onclick="event.stopPropagation(); toggleMore(this, ${index})">More</button>`
          : "";

      const card = `
      <div class="speaker-card" data-link="${speaker.link}">
        <img src="${speaker.image}" alt="${speaker.name}" class="speaker-image" />
        <div class="speaker-body">
          <div class="speaker-name">${speaker.name}</div>
          <div class="speaker-affiliation">${speaker.affiliation}</div>
          <ul class="speaker-interests">
            ${interestsPreview}
            ${interestsHidden}
          </ul>
          ${showMoreBtn}
          <div class="speaker-tag ${tagClass}">${speaker.speakerType}</div>
        </div>
      </div>
    `;

      container.append(card);
    });
  });

  // ----------------- More btn click ---------------------------------------------------------------------------

  $(document).on("click", ".speaker-card", function () {
    const link = $(this).data("link");
    window.open(link, "_blank"); // open in new tab
  });





});






function toggleMore(button, index) {
  $(`.hidden-${index}`).removeClass("hidden-interest");
  $(button).hide();
}
