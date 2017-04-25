-- Useful Queries

-- Most reviews by ip
SELECT *, COUNT(*) as count
FROM `review`
GROUP BY `ip`
ORDER BY count DESC