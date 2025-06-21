import $ from 'jquery';

export default function initMasterplanTabs() {
  // Masterplan Tabs functionality
  $('.masterplan-tab').on('click', function () {
    const targetId = $(this).attr('data-target');

    // Update tab active state
    $('.masterplan-tab').removeClass('active');
    $(this).addClass('active');

    // Show the correct content
    $('.masterplan-tab-content').removeClass('active');
    $('#' + targetId).addClass('active');

    // Reset floor selection to first tab
    $('.floor-tab').removeClass('active');
    $('.floor-content').removeClass('active');

    // Set first floor as active
    $('#' + targetId + ' .floor-tab:first-child').addClass('active');
    $('#' + targetId + ' .floor-content:first-child').addClass('active');
  });

  // Floor tabs functionality
  $('.floor-tab').on('click', function () {
    const floorType = $(this).attr('data-floor');
    const parentTabId = $(this).closest('.masterplan-tab-content').attr('id');

    // Update floor tab active state
    $(this).closest('.masterplan-tab-content__floors').find('.floor-tab').removeClass('active');
    $(this).addClass('active');

    // Show the correct floor content
    $(this).closest('.masterplan-tab-content').find('.floor-content').removeClass('active');
    $('#' + parentTabId + '-' + floorType).addClass('active');
  });
} 